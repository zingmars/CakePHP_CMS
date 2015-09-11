<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 class="text-light">Post list <span class="mif-file-text place-right"></span></h1>
    <hr class="thin bg-grayLighter">
    <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> New...</button>
    <button class="button disabled showmultipleaction">Perform actions on selected posts</button>
    <hr class="thin bg-grayLighter">
    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false">
       <thead>
       <tr>
           <td style="width: 20px"></td>
           <td class="sortable-column" style="width: 20px">id</td>
           <td class="sortable-column">Title</td>
           <td class="sortable-column">Example</td>
           <td class="sortable-column">Posted</td>
           <td class="sortable-column">Author</td>
           <td class="sortable-column">Last edit</td>
           <td class="sortable-column" style="width: 20px">Status</td>
           <td class="sortable-column" style="width: 20px">Action</td>
       </tr>
       </thead>
       <tbody>
           <tr>
               <td>
                   <label class="input-control checkbox small-check no-margin">
                       <input type="checkbox">
                       <span class="check"></span>
                   </label>
               </td>
               <td>1</td>
               <td>Test post 1</td>
               <td>Lorem ipsum...</td>
               <td>2015/01/01 11:11</td>
               <td>zingmars</td>
               <td>2015/01/01 11:11</td>
               <td title="published" class="align-center"><span class="mif-checkmark fg-green"></span></td>
               <td><button class="button primary showaction"">Action</button></td>
           </tr>
       </tbody>
    </table>
</div>
<div data-role="dialog" id="action_dialogue">
    <button class="button primary editpost">Edit</button>
    <button class="button warning disablepost">Disable</button>
    <button class="button alert deletepost">Delete</button>
    <!--<span class="dialog-close-button"></span>-->
</div>