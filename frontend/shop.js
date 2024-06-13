document.getElementById('arrow-button').addEventListener('click', function(){ //si le boutton arrow-button est cliqué
    document.getElementById('overlay').classList.add('d-block'); //ajouter la class d-block a overlay
    document.getElementById('arrow-button').classList.remove('d-block', 'd-lg-none'); //suprimer les class d-block, d-lg-none
    document.getElementById('arrow-button').classList.add('d-none'); //ajouter la classe d-none pour suprimer le boutton
    document.getElementById('close-overlay').classList.remove('d-none'); //suprimer la class d-none du deuxieme boutton
    document.getElementById('close-overlay').classList.add('d-block'); //afficher ce deuxieme boutton

    //positionner la superposition
    document.getElementById('overlay').classList.add('position-fixed', 'w-100', 'h-100');

    //appliquer un style a la superposition
    document.getElementById('overlay').classList.add('c-overlay');
    document.getElementById('overlay-content').classList.add('c-overlay-content');
});

document.getElementById('close-overlay').addEventListener('click', function(){
    document.getElementById('overlay').classList.remove('d-block');
    document.getElementById('arrow-button').classList.add('d-block', 'd-lg-none');
    document.getElementById('close-overlay').classList.add('d-none');
    document.getElementById('close-overlay').classList.remove('d-block');

    document.getElementById('overlay').classList.remove('position-fixed', 'w-100', 'h-100');

    //enlever le style a la superposition
    document.getElementById('overlay').classList.remove('c-overlay');
    document.getElementById('overlay-content').classList.remove('c-overlay-content');
});

//fermer la superposition si on clique sur un espace vide

document.getElementById('overlay').addEventListener('click', function(event){
    if(event.target === document.getElementById('overlay')){
        document.getElementById('overlay').classList.remove('d-block');
        document.getElementById('arrow-button').classList.add('d-block', 'd-lg-none');
        document.getElementById('close-overlay').classList.add('d-none');
        document.getElementById('close-overlay').classList.remove('d-block');

        document.getElementById('overlay').classList.remove('position-fixed', 'w-100', 'h-100');

        //enlever le style a la superposition
        document.getElementById('overlay').classList.remove('c-overlay');
        document.getElementById('overlay-content').classList.remove('c-overlay-content');
    }
})