<template>
    <v-app id="inspire">

        <v-toolbar color="indigo" dark fixed app>
            <v-toolbar-title>Megasoft Calculator</v-toolbar-title>

            <v-spacer></v-spacer>
            <v-toolbar-title>Report:</v-toolbar-title>
            <v-toolbar-items>

                <v-btn flat v-on:click="clickHandler('daily')">Daily</v-btn>
                <v-btn flat v-on:click="clickHandler('weekly')">Weekly</v-btn>
                <v-btn flat v-on:click="clickHandler('monthly')">Monthly</v-btn>

            </v-toolbar-items>

        </v-toolbar>

        <v-content>
            <v-container fluid fill-height>
                <v-layout justify-center align-center>
                    <v-card class="grey lighten-4 elevation-0">

                        <v-container fluid>
                            <v-layout row>
                                <v-layout row-sm column>
                                    <slot></slot>
                                </v-layout>
                            </v-layout>
                        </v-container>

                    </v-card>

                </v-layout>
            </v-container>
        </v-content>


        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
            <v-card>
                <v-toolbar dark color="primary">

                    <v-toolbar-title>Settings</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon dark @click="dialog = false">
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-toolbar>

                <report ref="report"></report>

                <v-divider>

                </v-divider>

            </v-card>
        </v-dialog>


        <v-footer color="indigo pl-3">
            <span class="white--text">Copyrights &copy; 2019 All Rights Reserved by Megasoft</span>
        </v-footer>

    </v-app>
</template>

<script>
    export default {
        data () {
            return {
                dialog: false,
                type: 'daily'
            }
        },
        methods: {
            clickHandler(type) {
                this.dialog = true;
                this.type= type;
                this.$refs.report.init(this.type);
            }
        }
    }
</script>