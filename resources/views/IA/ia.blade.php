@extends('adminlte::page')

@section('title', 'Free Courses')

@section('content_header')
    <h1>IA</h1>
@stop

@section('content')
   @livewire('i-a')
@stop

@section('css')
<style>
    /* Estilos generales */
    body {
    font-family: Arial, sans-serif;
    line-height: 1.5rem;
    margin: 0;
    padding: 0;
    }

    /* Contenedor principal */
    .contenedor {
    max-width: 600px;
    padding: 30px;
    margin: 0 auto;
    }

    /* Título */
    h1 {
    font-size: 1.5rem;
    margin-bottom: 30px;
    text-align: center;
    }

    /* Consulta */
    #consulta {
    width: 100%;
    height: 200px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    }

    /* Botón de consulta */
    #botonConsulta {
    display: block;
    margin: 30px auto 0 auto;
    padding: 10px 20px;
    border: 1px solid #000;
    border-radius: 5px;
    background-color: #000;
    color: #fff;
    cursor: pointer;
    }

    /* Resultados de la consulta */
    #resultadoConsulta {
    background-color: #eee;
    padding: 10px;
    margin-top: 30px;
    font-family: monospace;
    }

    /* Cargando... */
    .loading {
    color: #666;
    font-size: 1.2rem;
    text-align: center;
    }
</style>
@stop

@section('js')
<script type="importmap">
    {
    "imports": {
    "@google/generative-ai": "https://esm.run/@google/generative-ai"
    }
    }
</script>

<script type="module">
    import { GoogleGenerativeAI } from "@google/generative-ai"
    const clave = "AIzaSyD2WVkk0mzd8DJQDkOrsRhTTI5NF4LgG58"  // copiar su clave

    const genAI = new GoogleGenerativeAI(clave)
    const model = genAI.getGenerativeModel({ model: "gemini-pro" })

    document.querySelector("#botonConsulta").addEventListener("click", async () => {
    desactivarBoton()
    const consulta = document.querySelector("#consulta").value
    const resultadoConsulta = document.querySelector("#resultadoConsulta")
    try {
    const result = await model.generateContent(consulta)
    const response = await result.response
    const text = response.text()
    resultadoConsulta.innerHTML = text
    } catch (error) {
    resultadoConsulta.innerHTML = 'Problemas en la consulta'
    }
    activarBoton()
    })

    function desactivarBoton() {
    const botonConsulta = document.querySelector("#botonConsulta")
    botonConsulta.disabled = true
    botonConsulta.innerText = "Consultando..."
    }

    function activarBoton() {
    const botonConsulta = document.querySelector("#botonConsulta")
    botonConsulta.disabled = false
    botonConsulta.innerText = "Consultar"
    }
</script>
@stop
