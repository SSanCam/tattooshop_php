.body__main {

min-height: 100vh;
padding: 2em;

display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
background-color: rgb(220, 220, 220);

}

.main__form-plantilla {

min-height: 70%;
min-width: 40%;
aspect-ratio: 1/1;

border: 2px solid rgb(236, 236, 236);
box-shadow: 0px 0px 5px 6px #1e1818;

border-radius: 2em;
padding: 1em;
background-image: url("https://cdn.pixabay.com/photo/2022/02/21/20/41/tattoo-7027595_960_720.jpg");
background-position: center; /* Center the image */
background-repeat: no-repeat; /* Do not repeat the image */
background-size: cover; /* Resize the background image to cover the entire container */

display: flex;
align-items: center;
justify-content: center;
}

.main__form-plantilla-error {
box-shadow: 0px 0px 7px 7px #e32227 !important;
}

.form-plantilla__container {

min-width: 80%;
}

.container__btns-form {

margin-top: 1em;
display: flex;
justify-content: space-evenly;
align-items: center;

}

.btns-form__btn-enviar {
flex-basis: 40%;
}