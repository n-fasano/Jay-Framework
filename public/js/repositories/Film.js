class Film {
    async getAll() {
        return fetch('/api/films')
            .then(response => response.json());
    }

    async search(queryString) {
        return fetch('/api/films/' + queryString)
            .then(response => response.json());
    }

    async get(id) {
        return fetch('/api/film/' + id)
            .then(response => response.json())
            .then(json => {
                json.film[0].datesortie = (new Date(json.film[0].datesortie.date)).toLocaleDateString('fr-FR', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                return json;
            });
    }

    async delete(id) {
        let init = {
            method: 'DELETE',
            headers: new Headers(),
            mode: 'cors',
            cache: 'default'
        };

        return fetch('/api/film/' + id, init)
            .then(response => response.json());
    }
}