//Start of Find and Replace of FIRST INSTANCE
document.addEventListener("DOMContentLoaded",function(){
	let findbutton = document.getElementById("findbutton");
	findbutton.addEventListener("click",findAndReplace);
});
function findAndReplace(ff){
	ff.preventDefault();
	let find = document.getElementById("find").value;
	let replaced = document.getElementById("replace").value;
	let docpage = document.getElementById("docpage").value;
	let	count = docpage.indexOf(find);
		change = docpage.replace(find, replaced);		
		document.getElementById("docpage").value = change;	
	};
	
	
//Start of Find and Replace ALL INSTANCES	
document.addEventListener("DOMContentLoaded",function(){
let reallbutton = document.getElementById("repall");
	reallbutton.addEventListener("click",replaceALL);
	console.log(find);
});	

function replaceALL(fs){
	fs.preventDefault();
	let find = document.getElementById("find").value;
	let replaced = document.getElementById("replace").value;
	let docpage = document.getElementById("docpage").value;
	let	count = docpage.indexOf(find);
	change = docpage.replaceAll(find, replaced);	
	document.getElementById("docpage").value = change;	
}	
