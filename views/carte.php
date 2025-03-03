<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carte</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <link rel="stylesheet" href="assets/carte.css">
    </head>
    <body>
        <div id="entete">
            <h2>Communes Françaises</h2>
            <div style="margin-left: 30px">
                <!-- Formulaire de recherche -->
                <form action="" @submit.prevent="recherche(this.texte)">
                    <input type="text" v-model="texte" @input="autocomplete" v-on:focus="autocomplete">
                    <button type="submit">Rechercher</button>
                </form> 
            
                <!-- Liste des villes retournées -->
                <ul id="villes" v-if="showAutocomplete">
                    <li v-for="ville in villes" @click="insee(ville.nom)">
                        {{ville.nom}}-{{ville.insee}}
                    </li>
                    <p v-if="villes.length === 0 && showAutocomplete" class="no-result">Aucune ville trouvée.</p>
                </ul>

                <button @click="selectSearchMethod('commence')" :class="{'selectedMethod': (method == 'commence')}">Commence</button>
                <button @click="selectSearchMethod('contient')" :class="{'selectedMethod': (method == 'contient')}">Contient</button>
                <button @click="selectSearchMethod('finit')" :class="{'selectedMethod': (method == 'finit')}">Finit par</button>
                <button @click = "recherche('La Rochelle')">La Rochelle </button>
                <button @click = "recherche('fort')">Commence par 'fort'</button>

            </div>
            
        </div>

        <div class="carteTest" id="carte"></div>

        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="assets/carte.js"></script>
    </body>

</html>