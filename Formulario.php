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
    //Menu 
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
                //Seleccion del cliente
                <label for="cafe">Cafes</label>
                <select id="cafe" name="cafe">
                <option value="espresso">Espresso</option>
                <option value="leche">Cafe con Leche</option>
                <option value="latte">Latte</option>
                <option value="capuccino">Capuccino</option>
                <option value="americano">Americano</option>

                //Seleccion de acompañamiento     
                <label for="acompañamiento">Acompañamiento</label>
                <select id="acompañamiento" name="acompañamiento">
                <option value="medialunas">Medialunas</option>
                <option value="bagel">Bagel Sandwich</option>
                <option value="croissant">Croissant</option>
                <option value="tostado">Tostado de jamon y queso</option>
                <option value="croque">Croque Monsieur</option>

                //Seleccion de bebidas
                <label for="bebidas">Bebidas</label>
                <select id="bebidas" name="bebidas">
                <option value="frappuccino">Frappuccino</option>
                <option value="te">Te Helado</option>
                <option value="acai">Frutilla Acai</option>
                <option value="chocolate">Chocolate Caliente</option>
                <option value="submarino">Submarino</option>
    </select>
    <button type="submit">Enviar</button>
            </form>   
</main>          

</body>
<footer> CapiExpress </footer>
</html>
