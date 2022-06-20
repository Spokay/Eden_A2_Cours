window.onload = () => {
    // va chercher la zone texte
    let msg = document.querySelector(".comment-msg-answer");

    let comments = document.querySelectorAll(".comment");
    for (let i = 0; i < comments.length; i++) {
        console.log(comments[i]);
        let answerButton = comments[i].querySelector(".answer-comment");
        answerButton.addEventListener("click", function(){
            let commentId = comments[i].querySelector(".comment-id").innerText;
            let articleId = comments[i].querySelector(".article-id").innerText;
            let form = "<form method='post' action='/article/"+ articleId + '/comment/'+ commentId +'/create/' +"'><textarea name='Texte' id='Texte' cols='30' rows='10'></textarea> <input type='submit' value='Envoyer' class='answer-submit'></form>";
            comments[i].querySelector('.comment-answer-container').innerHTML = form;
            let submitAnswer = comments[i].querySelector(".answer-submit");
            submitAnswer.addEventListener('submit', function(e){
                e.preventDefault();
                ajoutCommentaire();
            });
        });

    }


    // va chercher le bouton valid


    // charge les nouveaux messages
    // setInterval(chargeCommentaire, 1000);
    // je n'ai pas eu le temps de faire cette fonction
}


function ajoutCommentaire(){
    // récupère le commentaire
    let commentaire = this.querySelector(".comment-msg-answer").value;
    let commentaireId = this.querySelector(".comment-msg-answer").value;

    // vérifie si le commentaire n'est pas vide
    if(commentaire != ""){
        let donnees = {};
        donnees["Texte"] = commentaire;
        donnees["Id_comment"] = commentaire;

        // convertit les données en JSON
        let donneesJson = JSON.stringify(donnees);

        // On instancie XMLHttpRequest
        let xmlhttp = new XMLHttpRequest();

        // gère la réponse
        xmlhttp.onreadystatechange = function(){
            // vérifie si la requête est terminée
            if(this.readyState == 4){
                // vérifie qu'on reçoit un code 201
                if(this.status == 201){
                    document.querySelector(".comment-msg-answer").value = "";
                }else{
                    let reponse = JSON.parse(this.response);

                }
            }
        }

        // On ouvre la requête
        xmlhttp.open("POST", '/article/'+ articleId + '/comment/'+ commentId +'/create/');

        // On envoie la requête en incluant les données
        xmlhttp.send(donneesJson)
    }
}

