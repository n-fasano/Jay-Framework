class Component {
  static createElement(tag, attributes) {
    let element = document.createElement(tag);
    for (const attribute in attributes) {
      element.setAttribute(attribute, attributes[attribute]);
    }
    let $e = new $element(element);
    return Object.assign(element, $e);
  }

  static createElementFromHTML(htmlString) {
    var div = document.createElement("div");
    div.innerHTML = htmlString.trim();

    // Change this to div.childNodes to support multiple top-level nodes
    let element = div.firstChild;

    let $e = new $element(element);
    return Object.assign(element, $e);
  }

  constructor({ template, root, state }) {
    this.i = 0;
    this.regex = new RegExp(`{{ *?([^{} ]*) *?}}`, "g");
    this.root = {
      element: root,
      children: this.buildTree(Utility.strToHTML(template))
    };
    this.initState();
    this.setState(state);
    this.template = template;
    this.show();
  }

  show() {
    for (const child of this.root.children) {
      this.root.element.append(child.element);
    }
  }

  buildTree(children) {
    let newChildren = new Array();
    for (const element of children) {
      let child = {
        element: $element.create(element),
        textContent: element.textContent,
        children: this.buildTree(element.children)
      };
      
      newChildren.push(child);
    }
    return newChildren;
  }

  parse() {
    let html = this.template;
    let vars = html.matchAll(this.regex);
    for (const arr of vars) {
      let fullMatch = arr[0];
      let match = arr[1];
      if (!this.state[match]) {
        throw new Error("Variable '" + match + "' does not exist");
      }
      html = html.replace(fullMatch, this.state[match].value);
    }
    return this.createElement("<div>" + html + "</div>");
  }

  hook(root) {
    this.root.element.innerHTML = "";
    this.root.element = root;
    this.display();
  }

  display() {
    this.root.element.innerHTML = "";
    this.root.element.append(this.parse());
  }

  createElement(html) {
    var div = document.createElement("div");
    div.innerHTML = html.trim();

    // Change this to div.childNodes to support multiple top-level nodes
    let element = div.firstChild;
    return element;
    // let $e = new $element(element);
    // return Object.assign(element, $e);
  }

  initState() {
    this.state = {};
  }

  setState(state) {
    for (const key in state) {
      if (!this.state[key]) {
        this.state[key] = {
          value: state[key],
          listeners: this.findVariableListeners(this.root.children, key)
        };
      } else {
        this.state[key].value = state[key];
      }
      this.state[key].listeners.forEach(l => {
        l.callback(state[key]);
      });
    }
  }

  getState(variable) {
    if(this.state[variable]) {
      return this.state[variable].value;
    }
    return null;
  }

  findVariableListeners(elements, variable) {
    let listeners = [];
    
    for (const element of elements) {
      if (element.children.length > 0) {
        listeners.push(
          ...this.findVariableListeners(element.children, variable)
        );
      }
      let realElement = element.element;
      if (
        realElement.childNodes.length > 0 &&
        realElement.textContentTemplate.match(
          new RegExp(`{{ *?${variable} *?}}`, "g")
        )
      ) {
        listeners.push({
          element: element,
          callback: value => {
            realElement.textContent = element.textContent.replace(
              new RegExp(`{{ *?${variable} *?}}`, "g"),
              value
            );
          }
        });
      } else if (realElement.getAttribute("if") == variable) {
        listeners.push({
          element: element,
          callback: bool =>
            bool ? realElement.hide() : realElement.show()
        });
      } else if (realElement.getAttribute("foreach") == variable) {
        listeners.push({
          element: element,
          callback: array => {
            realElement.innerHTML = "";
            for (let i = 0; i < array.length; i++) {
              const object = array[i];
              let templateString = realElement.innerHTMLTemplate;
              for (const key in object) {
                templateString = templateString.replace(
                  new RegExp(`{{ *?${key} *?}}`, "g"),
                  object[key]
                );
              }
              let newElement = Component.createElementFromHTML(templateString);
              realElement.append(newElement);
            }
          }
        });
      }
    }

    return listeners;
  }
}
