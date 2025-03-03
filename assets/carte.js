let map = L.map('carte').setView([48.85, 2.35], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

let points = L.geoJSON().bindPopup(function (layer) {
    return `
        <h3>${layer.feature.properties.label}</h3>
        <p>${layer.feature.properties.context}</p>
    `;
}).addTo(map);

Vue.createApp({
    data() {
        return {
            texte: '',
            villes: [],
            method: "contient",
            searchSelected: false,
            showAutocomplete: false
        }
    },
    methods: {
        recherche(param) {
            let url = 'http://api-adresse.data.gouv.fr/search/?q=' + param;
            fetch(url)
                .then(res => res.json())
                .then(json => {
                    points.clearLayers();
                    points.addData(json);
                    let bounds = points.getBounds().pad(0.02);
                    map.fitBounds(bounds);
                    this.showAutocomplete = false;
            })
        },
        autocomplete() {
            let url = '/villes?recherche=' + (this.method == "commence" ? "" : "%") + this.texte + (this.method == "finit" ? "" : "%");
            if(!this.texte) {
                this.villes = []
                this.showAutocomplete = false;
            } else {
                fetch(url)
                .then(res => res.json())
                .then(json => {
                    this.villes = json;
                    this.showAutocomplete = true
                });
            }
        },
        insee(insee) {
            console.log(insee);
            this.texte = insee;
            this.showAutocomplete = false;
        },
        selectSearchMethod(method) {
            this.method = method
            this.autocomplete()
        },
        setSearchSelecte() {
            console.log(11)
            this.showAutocomplete = false;
        }
    },
}).mount('#entete');