@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
<style>
     @media  (width: 1024px) {
        #Divglobale {
      margin-right:50px; /* Hide the sidebar by default on smaller screens */
    }
}
@media  (min-width: 1025px) and  (max-width:1444 px) {
    #Divglobale {
      margin-left:0px; /* Hide the sidebar by default on smaller screens */
    }
}
@media (min-width: 768px) {
    #Divglobale {
          margin-left: 214px; /* Set max-width to match iPad Air width */
        }
    }
    .fixed-position {
        position: fixed;
        top: 20px; /* Adjust top position as needed */
        left: 300px;
        width:80%; /* Adjust left position as needed */
        z-index: 1000; /* Set a higher z-index to ensure it appears above other elements */
    }

</style>
<div  class="mt-5" >

<div class="container" id="Divglobale">
<div class="  row fixed-position mt-5">

    
    <div class="col-md-10 mt-5 ">
    <form action="">
        <fieldset class="border p-2">
            <legend class="w-auto" >filtrer par :</legend>
          <label for="">  Année:</label>&nbsp;&nbsp;
            <select name="" id="" class="w-4 form-control ng-pristine ng-valid ng-touched" id="field_anneeUniversitaireId" >
                <option value="0: undefined" selected></option>
                <option value="">2020-2021</option>
                <option value="">2021-2022</option>
                <option value="">2022-2023</option>
                <option value="">2023-2024</option>
            </select>
            <div>
    <button class="btn btn-sm btn-inverse border" style="background-color:#3966c2;color:white;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="margin-right: 5px;">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
        Recherche
    </button>
</div>
        </fieldset>
        
    </form>
</div></div><br><br><br><br><br><br>
    <div class=" container mt-5">
    <div class="row mt-5">
   
    <div  class="col-md-9 mt-5  ">
        <table class="table table-striped table-bordered data-table table-th-valign-middle table-td-valign-middle m-0 p-0" style="width:100%;  color:white ; background-color: #3966c2">
       
        <tr>
        <th colspan="3">
     <span>Version étape</span>
</th>
<th colspan="3">
     <span>Semestre</span>
</th>
<th colspan="4">
     <span>Module</span>
</th>
     
<th colspan="3">
     <span>Elements</span>
</th>
<th colspan="2" rowspan="2" >
     <span class="">Epreuve</span>
</th>
<th colspan="1" rowspan="2">
     <span>Etat</span>
</th>
<tr>
    <th>semestre</th>
    <th>note</th>
    <th>res</th>
    <th>semestre</th>
    <th>note</th>
    <th>res</th>
    <th>Nom </th>
    <th>note</th>
    <th>res</th>
    <th>pj</th>
    <th>Nom </th>
    <th>note</th>
    <th>res</th>
</tr> </thead>
<tbody style=" background-color: #ccc;">
<tr >
    <td rowspan="34"></td>
    <td  rowspan="34"></td>
    <td  rowspan="34"></td>
    <td  rowspan="16"></td>
    <td  rowspan="16"></td>
    <td  rowspan="16"></td>
    <td  rowspan="4"> module1</td>
    <td  rowspan="4"></td>
    <td  rowspan="4"></td>
    <td  rowspan="4"></td>
    <td  rowspan="4" ></td>
    <td  rowspan="4"></td>
    <td  rowspan="4" ></td>
    <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
    <td  rowspan="2"></td>
    <td  rowspan="2"></td></tr>
    <tr></tr>
    <tr>
<td></td>
        
      <td></td> 
    <td></td>
    
</tr>
<tr></tr>

<tr><td  rowspan="4"> module2</td>
    <td  rowspan="4"></td>
    <td  rowspan="4"></td>
    <td  rowspan="4"></td>
    <td  rowspan="4" ></td>
    <td  rowspan="4"></td>
    <td  rowspan="4" ></td>
    <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
    <td  rowspan="2"></td>
    <td  rowspan="2"></td></tr>
    <tr></tr><tr></tr><tr><td></td><td></td><td></td></tr>
<tr></tr>

<tr><td  rowspan="4"> module3</td>
    <td  rowspan="4"></td>
    <td  rowspan="4"></td>
    <td  rowspan="4"></td>
    <td  rowspan="4" ></td>
    <td  rowspan="4"></td>
    <td  rowspan="4" ></td>
    <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
    <td  rowspan="2"></td>
    <td  rowspan="2"></td></tr>
    <tr></tr>
    <tr><td></td><td></td><td></td></tr>
<tr></tr>

<tr><td  rowspan="4"> module5</td>
    <td  rowspan="4"></td>
    <td  rowspan="4"></td>
    <td  rowspan="4"></td>
    <td  rowspan="4" ></td>
    <td  rowspan="4"></td>
    <td  rowspan="4" ></td>
    <td  rowspan="2" style="background-color: #f1e6d7; font-weight: 400;"></td>
    <td  rowspan="2"></td>
    <td  rowspan="2"></td></tr>
    <tr></tr>
 <tr><td></td><td></td><td></td></tr>
 <tr></tr>
 



</tbody>


        </table>
    </div></div></div>

@endsection
