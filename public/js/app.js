// const filmController = new FilmController('index');

class Utility {
    static strToHTML(templateString) {
        var div = document.createElement("div");
        div.innerHTML = templateString.trim();
        return div.children;
    }

    static isIterable(object) {
        return object != null && typeof object[Symbol.iterator] === 'function';
    }
}




let html = `
    <h1 if="hidden">{{ title }}</h1>
    <article>
        <p>
            <ul foreach="products">
                <li>{{ name }} - {{ price }}€</li>
            </ul>
        </p>
    </article>
    <input type="text" id="input_title">
    <button id="hideBtn">Click me mofo ({{ hidden }})</button>
`;
let app = $("#app");
let state = {
    title: "Vous êtes ici : " + location.pathname + location.search,
    products: [
        {
            name: "Un super téléphone",
            price: 200
        },
        {
            name: "Un super téléphone",
            price: 200
        },
    ],
    hidden: false
};

let product_page = new Component({ template: html, root: app, state: state });

let products = [
    {
        name: 'Une belle table',
        price: 2001
    },
    {
        name: 'Un vol-au-vent succulent',
        price: 48
    },
    {
        name: 'Un autre produit',
        price: 17.77
    }
];

product_page.setState({ products: products });

$('#input_title').on('input', e => product_page.setState({ title: e.target.value }));
$('#hideBtn').on('click', e => product_page.setState({
    hidden: !product_page.getState('hidden')
}));

let html2 = `
    <p>{{ test }}</p>
`;

// let component2 = new Component({
//     template: html2,
//     root: app,
//     state: {
//         test: 'coucou'
//     }
// });