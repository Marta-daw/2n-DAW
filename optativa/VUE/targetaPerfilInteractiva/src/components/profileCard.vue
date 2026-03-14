<template>
    <div class="body">
        <h1>Perfil interactiu</h1>

        <div class = "components">
            <div class="formCard">
                <label for="name">Nom: </label>
                <input type="text" id="name" name="name" v-model="name" placeholder="Escriu el teu nom..." />

                <label for="city">Ciutat: </label>
                <input type="text" id="city" name="city" v-model="city" placeholder="Escriu la teva ciutat..." />

                <label for="tech">Tecnologia preferida: </label>
                <input type="text" id="tech" name="tech" v-model="tech" placeholder="Escriu la teva tecnologia preferida..." />
            </div>

            <div class="card">
                <h2>Perfil</h2>

                <div v-if="!name && !city && !tech">
                    <p class="pName"><strong>Nom:</strong> Introdueix el teu nom </p>
                    <p class="pCiutat"><strong>Ciutat: </strong> Introdueix la teva ciutat</p>
                    <p class="pTech"><strong>Li agrada </strong> cap tecnologia al formulari </p>
                </div>
                <div v-else-if="!name && !city">
                    <p class="pName"><strong >Nom:</strong> Introdueix el teu nom </p>
                    <p class="pCiutat"><strong>Ciutat: </strong> Introdueix la teva ciutat</p>
                    <p class="pTech"><strong>Li agrada </strong> {{ tech }}</p>
                </div>
                <div v-else-if="!name && !tech">
                    <p class="pName"><strong >Nom:</strong> Introdueix el teu nom </p>
                    <p class="pCiutat"><strong>Ciutat: </strong>{{ city }} </p>
                    <p class="pTech"><strong>Li agrada </strong> cap tecnologia al formulari </p>
                </div>
                <div v-else-if="!city && !tech">
                    <p class="pName"><strong >Nom:</strong> {{ name }} </p>
                    <p class="pCiutat"><strong>Ciutat: </strong> Introdueix la teva ciutat</p>
                    <p class="pTech"><strong>Li agrada </strong> cap tecnologia al formulari </p>
                </div>
                <div v-else>
                    <p class="pName"><strong >Nom: </strong>{{ name }} </p>
                    <p class="pCiutat"><strong>Ciutat: </strong>{{ city }} </p>
                    <p class="pTech"><strong>Li agrada </strong> {{ tech }}</p>
                </div>
                
            </div>
        </div>
        
    </div>
    
</template>

<script setup>
import { ref } from 'vue'

const name = ref('')
const city = ref('')
const tech = ref('')
</script>

<style scoped>
.body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    font-family: Arial, sans-serif;
}

.components {
    display: flex;
    gap: 50px;

    .formCard {
        display: flex;
        flex-direction: column;
        gap: 15px;
        border: 2px solid #ccc;
        padding: 20px;
        width: 250px;

    }

    .card{
        display: flex;
        flex-direction: column;
        gap: 10px;
        border: 2px solid #ccc;
        padding: 20px;
        width: 350px;
    }
}

.pName, .pCiutat, .pTech {
    padding: 10px;
}

input {
    padding: 10px;
}
</style>