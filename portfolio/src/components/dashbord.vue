<template>
  <router-link to="/" id="btnlogout"  class="btn btn-primary" @click="logout">Déconnexion</router-link>
  
<div id="img">
      <!-- <img src="https://monteluke.com.au/wp-content/gallery/linkedin-profile-pictures/9.JPG" alt="" id="imgprofile"> -->
      <img :src="'http://localhost:8000/assets/images/' + info.image" alt=""  id="imgprofile" data-bs-toggle="modal" data-bs-target="#showimg">
      <input type="file" class="form-control-file" @change="handleFileUpload($event)" name="image" id="exampleFormControlFile1">

</div>

  <div id="form_cv">
        
    <form>

    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Prénom" v-model="info.prenom" name="prenom">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Nom" v-model="info.nom" name="nom">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="email" class="form-control" placeholder="Adresse e-mail" v-model="info.email" name="email">
      </div>
      <div class="col">
        <input type="tel" class="form-control" placeholder="Numéro de téléphone" v-model="info.tele" name="tele">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Adresse" v-model="info.adresse" name="adresse">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Ville" v-model="info.ville" name="ville">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Code postal" v-model="info.codepostal" name="codepostal">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Pays" v-model="info.pay" name="pay">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <textarea class="form-control" placeholder="Objectif professionnel" v-model="info.objct" name="objct"></textarea>
      </div>
    </div>
    <button style="margin-top: 1em;" @click="updateinfo" type="button" class="btn btn-primary">Enregistrer</button>
  </form>

  <h3 class="titre">Expériences</h3>
    <router-link to="" class="btn btn-secondary addbtn" data-bs-toggle="modal" data-bs-target="#addexpr">Ajouter une expérience</router-link>
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th>Nom de l'expérience</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>nabil</td>
                <td>2023</td>
                <td>2025</td>
                <td>
                    <a href="" style="margin-right: 1em;">Modifier</a>
                    <a href="" style="color: red;">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>

    <h3 class="titre">Formations</h3>
    <router-link to="" class="btn btn-secondary addbtn" data-bs-toggle="modal" data-bs-target="#addform">Ajouter des formations</router-link>
    <table class="table table-striped mt-5">
      <thead>
            <tr>
                <th>Nom de l'information</th>
                <th>Description</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <tr v-for="frm in formation" :key="frm._id">
              <td>{{ frm.nom }}</td>
              <td>{{ frm.description }}</td>
              <td>{{ frm.start }}</td>
              <td>{{ frm.end }}</td>
              <td>
                  <a href="" style="margin-right: 1em;" data-bs-toggle="modal" data-bs-target="#updateform" @click="inputformation(frm._id ,frm.nom, frm.description,frm.start,frm.end)">Modifier</a>
                  <p style="color: red; cursor: pointer" @click="deleteformation(frm._id)">Supprimer</p>
              </td>
          </tr>
        </tbody>
    </table>
    <h3 class="titre">Langues</h3>
    <router-link to="" class="btn btn-secondary addbtn" data-bs-toggle="modal" data-bs-target="#addlangue">Ajouter des langues</router-link>
    <table class="table table-striped mt-5">
      <thead>
            <tr>
                <th>Nom de la langue</th>
                <th>Niveau </th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Francais</td>
                <td>NAdi</td>
              
                <td>
                    <a href="" style="margin-right: 1em;">Modifier</a>
                    <p style="color: red;">Supprimer</p>
                </td>
            </tr>
        </tbody>
    </table>


    
</div>

<div style="height: 100px;"></div>


<!-- Modales  -->


    <!-- Modal -->
    <div class="modal fade" id="addexpr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une expérience</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="experienceName" class="form-label">Nom de l'expérience</label>
            <input type="text" class="form-control" id="experienceName" placeholder="Nom de l'expérience">
          </div>
          <div class="mb-3">
            <label for="experienceName" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="experienceName" placeholder="Description..."></textarea>
          </div>
          <div class="mb-3">
            <label for="startDate" class="form-label">Date de début</label>
            <input type="date" class="form-control" id="startDate">
          </div>
          <div class="mb-3">
            <label for="endDate" class="form-label">Date de fin</label>
            <input type="date" class="form-control" id="endDate">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Sauvegarder</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="addform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une formation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="addformation">
            <div class="mb-3">
              <label for="experienceName" class="form-label">Nom de la formation</label>
              <input type="text" class="form-control" v-model="newFormation.nom" id="experienceName" placeholder="Nom de la formation">
            </div>
            <div class="mb-3">
              <label for="experienceDescription" class="form-label">Description</label>
              <textarea class="form-control" v-model="newFormation.description" id="experienceDescription" placeholder="Description..."></textarea>
            </div>
            <div class="mb-3">
              <label for="startDate" class="form-label">Date de début</label>
              <input type="date" class="form-control" v-model="newFormation.start" id="startDate">
            </div>
            <div class="mb-3">
              <label for="endDate" class="form-label">Date de fin</label>
              <input type="date" class="form-control" v-model="newFormation.end" id="endDate">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modufier une formation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="updateformation">
            <div class="mb-3">
              <label for="experienceName" class="form-label">Nom de la formation</label>
              <input type="hidden"  id="for_id" name="id" placeholder="Nom de la formation">
              <input type="text" class="form-control"  id="for_nom" name="nom" placeholder="Nom de la formation">
            </div>
            <div class="mb-3">
              <label for="experienceDescription" class="form-label">Description</label>
              <textarea class="form-control"  id="for_description" name="description" placeholder="Description..."></textarea>
            </div>
            <div class="mb-3">
              <label for="startDate" class="form-label">Date de début</label>
              <input type="date" class="form-control"  name="start" id="for_start">
            </div>
            <div class="mb-3">
              <label for="endDate" class="form-label">Date de fin</label>
              <input type="date" class="form-control"  name="end" id="for_end">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



<div class="modal fade" id="addlangue" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une langue</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
          <div class="mb-3">
            <label for="experienceName" class="form-label">Nom de la langue</label>
            <input type="text" class="form-control" name="langue"id="experienceName" placeholder="Nom de la langue">
          </div>
          <div class="mb-3">
            <select name="level" id="level" class="form-control">
              <option value="" disabled selected>Sélectionnez le niveau</option>
              <option value="débutant">Débutant</option>
              <option value="intermédiaire">Intermédiaire</option>
              <option value="avancé">Avancé</option>
              <option value="expert">Expert</option>
            </select>

          </div>

          
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Sauvegarder</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="showimg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"> 
    
    <div class="modal-content">
      <img :src="'http://localhost:8000/assets/images/' + info.image" alt="">
    </div>
  </div>
</div>






</template>
<script>
import axios from "axios";
import Swal from 'sweetalert2';


export default {
  name: 'dashboard',

  data() {
    return {
      info: {
        nom: '',
        email: '',
        tele: '',
        adresse: '',
        ville: '',
        codepostal: '',
        pay: '',
        objct: ''
      },

      imageUrl: '' 
      ,
      formation :{
        nom: '',
        description: '',
        start: '',
        end: ''
      },
      
      newFormation: {
        nom: '',
        description: '',
        start: '',
        end: ''
      },
      newFormationup: {
        nom: '',
        description: '',
        start: '',
        end: ''
      }
    };
  },

  mounted() {

    if (!localStorage.getItem('token')) {
 
      this.$router.push('/');
    } else {
      this.getinfo(); 
      this.getformations()
      this.modalsuccess("Bienvenue de retour, Hakimi")
    }

  },

  methods: {
    logout() {
    Swal.fire({
        title: 'Êtes-vous sûr?',
        text: 'Voulez-vous vous déconnecter?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, déconnectez-vous'
    }).then((result) => {
        if (result.isConfirmed) {
            localStorage.removeItem('token');
            this.$router.push('/');
        } else {
            this.$router.push('dashboard');
        }
    });
},


    getinfo() {
      axios.get('http://127.0.0.1:8000/api/getinfo', {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}` 
        }
      })
        .then(res => {
          
          this.info = res.data;
          console.log(this.info);
        })
        .catch(error => {
          console.error('Error getting user info:', error);
        });
    },

    getformations() {
      axios.get('http://127.0.0.1:8000/api/getformations', {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}` 
        }
      })
        .then(res => {
          this.formation = res.data.Formations; 

          console.log(this.formation);
        })

        .catch(error => {
          console.error('Error getting user formations:', error);
        });
    },
    addformation() {
      axios.post('http://127.0.0.1:8000/api/storeformation', this.newFormation, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}` 
        }
      })
        .then(res => {
          console.log('Data updated successfully:', res.data);
          this.modalsuccess('La Formation a ete ajoute Avec Succès');

          this.getformations()
        })
        .catch(error => {
          console.error('Error updating user info:', error);
        });
    },
    deleteformation(id) {
      console.log("ID de la formation à supprimer:", id);
      this.deleteModal().then((result) => {
          if (result.isConfirmed) {
              axios.get('http://127.0.0.1:8000/api/deleteformation/' + id, {
                  headers: {
                      Authorization: `Bearer ${localStorage.getItem('token')}`
                  }
              })
              .then(res => {
                  console.log('Formation supprimée avec succès:', res.data);
                  this.modalsuccess('Supprimer La formation', 'Avec Succès');
                  this.getformations();
              })
              .catch(error => {
                  console.error('Erreur lors de la suppression de la formation:', error);
              });
          }
    });
}
,
    updateinfo() {
      axios.post('http://127.0.0.1:8000/api/updateinfo', this.info, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}` 
        }
      })
        .then(res => {
          console.log('Data updated successfully:', res.data);
          this.modalsuccess('Les information a ete modifier Avec Succès');

        })
        .catch(error => {
          console.error('Error updating user info:', error);
        });
    },

    
    handleFileUpload(event) {
      if (event.target.files.length > 0) {
        const file = event.target.files[0];
        const formData = new FormData();
        formData.append('image', file);

        axios.post('http://127.0.0.1:8000/api/updateimage', formData, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}` 
          }
        })
          .then(response => {
            this.imageUrl = response.data.image_url;
            console.log('Image uploaded successfully');
          this.modalsuccess("L'image a ete modifier Avec Succès'" );


            this.getinfo();
          })
          .catch(error => {
            console.error('Error uploading image:', error);
          });
      }
    },
    
    modalsuccess(title){
      Swal.fire({
        title: title,
        icon: "success"
    });
    },
    deleteModal() {
    return Swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Vous ne pourrez pas annuler cette action!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui je suis sûr,!'
    });
},
  inputformation(id ,nom, description,start,end){
        document.getElementById('for_id').value = id;
        document.getElementById('for_nom').value = nom;
        document.getElementById('for_description').value = description;
        document.getElementById('for_start').value = start;
        document.getElementById('for_end').value = end;
  } ,
  updateformation() {

  var id = document.getElementById('for_id').value;
  var nom = document.getElementById('for_nom').value;
  var description = document.getElementById('for_description').value;
  var start = document.getElementById('for_start').value;
  var end = document.getElementById('for_end').value;

  this.newFormation = { id, nom, description, start, end };

  axios.post('http://127.0.0.1:8000/api/updateformation', this.newFormation, {
    headers: {
      Authorization: `Bearer ${localStorage.getItem('token')}`
    }
  })
  .then(res => {
    console.log('Formation updated successfully:', res.data);
    this.modalsuccess('La formation a été mise à jour avec succès');
    this.getformations();
    this.newFormation = {};

  })
  .catch(error => {
    console.error('Error updating formation:', error);
  });
}
  } 
}  



</script>




<style>
.modal-header{
  color :black;
}

.titre{
  width: 100%;
  text-align: center;
  color: rgb(0, 0, 0);
  border: 1px solid rgb(180, 180, 180);
  margin-top: 2em;
  background-color: white;
  opacity: 0.7;
  transition: 0.5s;
}
.titre:hover{
  opacity: 1;
}
.addbtn{
  margin-top: 2em;
  float: right;
  background-color: blue;
  margin-bottom: 1em;
  border : none;
}
/* body {
  background: url("https://miro.medium.com/v2/resize:fit:1400/0*MuGbmJPCtOpYRpd6");
  font-family: 'Open Sans', sans-serif;
  background-repeat: no-repeat;
  background-size: cover;
}    */
#img {
  margin-top: 4em;
  width: 100%;
  min-height: 15vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 2em;
}

#imgprofile {
  border-radius: 50%;
  width: 200px; 
  height: 200px; 
  display: block;
  cursor: pointer;
  transition: transform 0.6s;
  object-fit: cover; 
  border: 1px solid black;
}


    #form_cv{
        margin-top: 5em;
        margin-right: 5em;
        margin-left: 5em;
    }

    #form_cv div{
      margin-top: .5em;
    }

    #btnlogout{
      width: 20%;
      top: 2em;
      border-radius: 0px;
      transition: 0.3s ease;
      border-radius: 0px 50px 50px 0px;
      position: fixed;
      border: none;
      opacity: 0.5;

      
    }
    #btnlogout:hover{
      width: 40%;

      background-color: rgb(199, 51, 51);
      opacity: 1;
      color: white;
    }
</style>


