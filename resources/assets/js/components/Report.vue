<template>
    <v-data-table
            :headers="headers"
            :items="dataItems"
            class="elevation-1"
    >
        <template v-slot:items="props">
            <td>{{ props.item.activity }}</td>
            <td>{{ props.item.created_at }}</td>
            <td>{{ props.item.ip }}</td>
            <td>{{ props.item.agent }}</td>
        </template>
    </v-data-table>
</template>

<script>
    export default {
        methods: {
            init(reportType) {

                fetch(this.getURL(reportType))
                    .then(res => res.json())
                    .then(res => {
                        this.dataItems = res.data;
                    })
                    .catch(err => console.log(err));
            },

            getURL(reportType) {
                let url = "";
                switch (reportType) {
                    case 'daily':
                        url = 'api/calculator/report/daily'
                        break;
                    case 'weekly':
                        url = 'api/calculator/report/weekly'
                        break;
                    case 'monthly':
                        url = 'api/calculator/report/monthly'
                        break;
                    default:
                        break;
                }
                return url;
            }
        },
        data () {
            return {
                headers: [
                    { text: 'Operation', align: 'left', sortable: false, value: 'activity' },
                    { text: 'When', align: 'left', sortable: false, value: 'created_at' },
                    { text: 'IP', value: 'ip', sortable: false },
                    { text: 'User Agent', value: 'agent', sortable: false }
                ],
                dataItems: []
            }
        }
    }
</script>

<style scoped>

</style>