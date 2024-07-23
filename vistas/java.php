<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" id="form1">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
        <button type="submit">Enviar</button>
    </form>
</body>

<script>
    const formulario = document.getElementById('form1')

    const verNombre = async(e) =>{
        e.preventDefault()
        alert('Su nombre es '+ formulario.nombre.value)
    }
    formulario.addEventListener('submit', verNombre)
</script>

</html>
