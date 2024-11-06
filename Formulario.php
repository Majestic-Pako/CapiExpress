<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <header>
    <h1>Pedido Express</h1>
</header>
<main>
    <section id="menu">
        <article>
            <form action= "..pages/" method="get">
                <div>
                    <label for="nom" >Nombre y Apellido</label>
                    <input placeholder="Nombre y apellido" id= "nom" name="nom" type="text">
                </div>
                <div>
                    <label for="num">Teléfono:</label>
                    <input placeholder="celular/telefono" id="num" name="num" type="number">
                </div> 
                <fieldset>
                        <legend>Elija el gusto</legend>
                        <div>
                            <input id="si" type="radio" name="final" value="si">
                            <label for="si">Si</label>
                        </div>
                        <div>
                            <input id="no" type="radio" name="final" value="no">
                            <label for="no">No</label>
                        </div>                               
                    </fieldset>
                <div>
                    <label for="area" >Opiniones:</label>
                    <textarea id="area" name="area" placeholder="¿Algo que quieras agregar?" ></textarea>
                </div>
                <div>
                    <input type="submit" >
                </div>
                <label for="fruta">Selecciona una fruta:</label>
                <select id="fruta" name="fruta">
                <option value="manzana">Manzana</option>
                <option value="naranja">Naranja</option>
                <option value="plátano">Plátano</option>
                <option value="uva">Uva</option>
    </select>
    <button type="submit">Enviar</button>
            </form>   
</main>          

</body>
<footer> CapiExpress </footer>
</html>
