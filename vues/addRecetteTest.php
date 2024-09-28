<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function removeIng(x){
            let y=x.parentElement.parentElement;
            y.remove();
        }
        function addIngredient(){
            let div1= document.createElement('div');
            let div2= document.createElement('div');
            let button= document.createElement('button');
            button.className='input-group-text'
            button.innerText='Delete'
            button.onclick = function(){removeIng(this);};
            div2.appendChild(button);
            let input1 = document.createElement("input");
            div1.className='input-group mb-3'
            input1.type="text";
            input1.placeholder="ingredient ";
            input1.className="form-control";
            let input2 = document.createElement("input");
            input2.type="number";
            input2.placeholder="Quantite";
            input2.className="form-control";
            let select = document.createElement("select");
            const newOption = document.createElement('option');
            const text = document.createTextNode('Unite');
            newOption.appendChild(text);
            select.appendChild(newOption);
            select.className="form-control";
            let x=document.getElementById('ingredients');
            div1.appendChild(input1);
            div1.appendChild(input2);
            div1.appendChild(select);
            div1.appendChild(div2);
            x.appendChild(div1);
        }
    </script>
</head>


<center>

</center>
<br>
<br>
<div id="part1" style="display: flex;margin-right: auto;margin-left: auto;width: 768px;">
    <center>
        <div id="searchform" style="border: 1px solid;padding-left: 40px;padding-right: 40px; padding-top: 30px;padding-bottom: 30px;">
            <div id="ingredients">
                <h4 class="mt-1">Ingredients</h4>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ingredient">
                    <input type="number" class="form-control" placeholder="Quantite">
                    <select id='select-bar' class="form-control">
                        <option disabled selected hidden>Unite</option>
                        <option>gramme</option>
                        <option>Kg</option>
                    </select>

                    <div class="input-group-append">
                        <button class="input-group-text" onclick="removeIng(this)">Delete</button>
                    </div>

                </div>

            </div>
            <div>
                <button class="btn btn-primary" onclick="search()">Suivant</button>
                <button class="btn btn-primary" onclick="addIngredient()">Ajouter Ingredient</button>
            </div>
        </div>
    </center>

</div>
