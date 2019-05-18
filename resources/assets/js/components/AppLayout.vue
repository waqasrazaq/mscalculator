<template>
    <v-app id="inspire">

        <v-toolbar color="indigo" dark fixed app>
            <v-toolbar-title>Megasoft Calculator</v-toolbar-title>
        </v-toolbar>

        <v-content>
            <v-container fluid fill-height>
                <v-layout justify-center align-center>
                    <slot></slot>
                </v-layout>
            </v-container>
        </v-content>

        <v-footer color="indigo pl-3">
            <span class="white--text">Copyrights &copy; 2019 All Rights Reserved by Megasoft</span>
        </v-footer>

    </v-app>
</template>

<script>
    export default {

    }
</script>