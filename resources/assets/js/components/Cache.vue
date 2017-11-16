<template>
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cache</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary" @click="atualizar()">Atualizar</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-danger pull-right" @click="limpar()">Limpar</button>
                        </div>
                    </div>
                    <br>
                    <div v-if="exibirResultado">
                        <b>Hits: </b>{{resultado.hits}}
                        <br>
                        <b>Missed: </b>{{resultado.missed}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: '',
                resultado: '',
                exibirResultado: false
            }
        },
        methods: {
            atualizar() {
                axios.get('/cache/info').then((res) => {
                    this.resultado = res.data;
                    this.exibirResultado = true;
                }).catch((err) => {
                    this.exibirResultado = false;
                    console.log(err);
                })
            },
            limpar() {
                axios.get('/cache/flush').then((res) => {
                    this.atualizar();
                }).catch((err) => {
                    console.log(err);
                })
            }
        },
        mounted() {
            this.atualizar();

            this.$root.$on('buscou', () => {
                console.log('recebeu buscou');
                this.atualizar();
            })
        }
    }
</script>
