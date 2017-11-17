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
                        <button v-if="carregando" class="btn btn-success" disabled>Carregando...</button>
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
                exibirResultado: false,
                carregando: false
            }
        },
        methods: {
            submit() {
                this.carregando = true;
                axios.get('/alunos/' + this.id).then((res) => {
                    this.resultado = res.data;
                    this.exibirResultado = true;
                    this.carregando = false;

                    Events.$emit('buscou');

                }).catch((err) => {
                    this.exibirResultado = false;
                    this.carregando = false;
                    console.log(err);
                })
            }
        }
    }
</script>
