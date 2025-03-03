# Jay

This was my attempt at building a backend framework after bootcamp; because I could.  
It features:  
- An improved variable dumping function in the style of [var-dumper](https://github.com/symfony/var-dumper);
- Autowiring;
- Routing;
- File caching for routes and controllers;
- Simple HTTP request validation;
- WIP CLI interface, class generator, and ORM+DBAL capabilities.

Run the project using: `php -S localhost:8080`.

## Changelog

Wed, 18th of December, 2019:  
  - Improved significantly dumper.php, trying to replicate what var_dumper is doing.  
  - Couldn't manage to have the dropdowns close on click.  

Sat, 21st of December, 2019:  
  - Managed to have the dropdowns close on click. I was removing the class before using .toggle(), thus was always adding it.  
  - Replicated the maker's make:entity. Very basic for now. No objects relations handling.  
  - It makes classes, properties, getters and setters.  

Mon, 23rd of December, 2019:  
  - Added .gitignore  
  - Changed routing: added parameter injection  

Sat, 28th of December, 2019:
  - Made subdirectories possible in the controllers directory
  - Made it so controllers themselves can have a route (thus all their method routes have a prefix)
  - Started working on the front-end framework again
  - This code is feeling familiar again, improved it slightly

Mon, 30th of December, 2019:
  - Added @Require annotation to inject dependencies
  - Created a container

Tue, 31th of December, 2019:
  - ORM can now hydrate objects!
  - The "writer" is now fully functionnal for basic class creation and update. Still no relation handling.
  - Created the SQLDatabase, SQLTable and SQLColumn object classes


@TODO: Implement localStorage cache (class Cache)

## Misc

Jay icon from [quipo - Flaticon](https://www.flaticon.com/free-icons/bluejay).