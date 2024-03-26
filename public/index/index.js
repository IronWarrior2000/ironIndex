function main(){
	getData();
};

function getData(){
	
	fetch('data.txt')
    .then(response => response.json())
    .then(data => {
        let monsterData = data;
        let submit = document.getElementById("submit");

        console.log(monsterData);
        submit.addEventListener("click", function(ee) {
        ee.preventDefault();
        filterAndReduceData(monsterData);
    });
        return monsterData;
    })
	.catch(function (error){
		console.log("ERROR!!! Please take a look at INDEX.JS from INDEX");
	});
}

function filterAndReduceData(monsterData){

    let monsterName = monsterData.map(data => data.name);
    let monsterType = monsterData.map(data => data.type);
    let monsterSize = monsterData.map(data => data.size);
    let monsterNum = monsterData.map(data => data.indexNum);
    let monsterBiome = monsterData.map(data => data.biome);

    const smallest = 1;
    const tallest = 5;

    let formType = document.getElementById("formType").value;
    let formBiome = document.getElementById("formBiome").value;

    let filterData = monsterData.filter(data =>
        data.type == formType,
        )
        .filter(data =>
            data.biome == formBiome,
            );
    
            
        
        let sortedData = filterData.sort()

    displayFilterData(sortedData);

    if(sortedData == false){
        alert("DATA DO NOT EXIST");
    };

    return sortedData;
}

function displayFilterData(sortedData){


 
    let monsterName = sortedData.map(data => data.name);
    let monsterType = sortedData.map(data => data.type);
    let monsterSize = sortedData.map(data => data.size);
    let monsterNum = sortedData.map(data => data.indexNum);
    let monsterBiome = sortedData.map(data => data.biome);
    
    


    monsterName.forEach((name) =>{
        const nameSpace = document.getElementById("name");
        const nameSpaceMaker = document.createElement("tr");
        nameSpaceMaker.innerHTML = name;
        nameSpace.appendChild(nameSpaceMaker);
     });



     monsterType.forEach((type) =>{
        const typeSpace = document.getElementById("type");
        const typeSpaceMaker = document.createElement("tr");
        typeSpaceMaker.innerHTML = type;
        typeSpace.appendChild(typeSpaceMaker);
     });

     monsterSize.forEach((size) =>{
        const sizeSpace = document.getElementById("size");
        const sizeSpaceMaker = document.createElement("tr");
        

        if(size == 1){
            sizeSpaceMaker.innerHTML = "Very Small";
            sizeSpace.appendChild(sizeSpaceMaker);
        }

        else if(size == 2){
            sizeSpaceMaker.innerHTML = "Humanish Size";
            sizeSpace.appendChild(sizeSpaceMaker);
        }

        else if(size == 3){
            sizeSpaceMaker.innerHTML = "Tall Human";
            sizeSpace.appendChild(sizeSpaceMaker);
        }

        else if(size == 4){
            sizeSpaceMaker.innerHTML = "Large";
            sizeSpace.appendChild(sizeSpaceMaker);
        }

        else if(size == 5){
            sizeSpaceMaker.innerHTML = "Gigantic";
            sizeSpace.appendChild(sizeSpaceMaker);
        }
        
        else(
            console.log("ERROR")
        )
     });

     monsterNum.forEach((num) =>{
        const numSpace = document.getElementById("indexNum");
        const numSpaceMaker = document.createElement("tr");
        numSpaceMaker.innerHTML = num;
        numSpace.appendChild(numSpaceMaker);
     });

     monsterBiome.forEach((biome) =>{
        const biomeSpace = document.getElementById("biome");
        const biomeSpaceMaker = document.createElement("tr");
        biomeSpaceMaker.innerHTML = biome;
        biomeSpace.appendChild(biomeSpaceMaker);
     });  
}
    //py -m http.server --bind 127.0.0.1
main();