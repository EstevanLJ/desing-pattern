<template>
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buscar Aluno</div>

                <div class="panel-body">
                    <form id="formAluno" class="form-inline" @submit.prevent="submit()">
                        <div class="form-group">
                            <input type="text" class="form-control" v-model="id" placeholder="ID">
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                    <br>
                    <pre v-if="exibirResultado">
                        {{resultado}}
                    </pre>

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
            submit() {

                axios.get('/alunos/' + this.id).then((res) => {
                    this.resultado = res.data;
                    this.exibirResultado = true;
                    this.$emit('buscou', 'oi');
                    console.log('emitiu buscou');

                }).catch((err) => {
                    this.exibirResultado = false;
                    console.log(err);
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
