 <!-- add Department Modal -->
 <div class="modal fade" id="addModal">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Add Department</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body" id="storeData">
                 <form id="add_department">
                     {{ csrf_field() }}
                     <div class="form-group">
                         <label for="department_name">Department Name:</label>
                         <input type="text" class="form-control" name="department_name" id="department_name">
                         <span
                             class="text-danger">{{ $errors->has('department_name') ? $errors->first('department_name') : '' }}</span>
                     </div>
                     <div class="modal-footer">
                         <button type="submit" class="btn btn-info">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Edit Department Modal -->
 <div class="modal fade" id="editDptModal">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Edit Department </h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 <form id="update_department">
                     <div class="form-group">
                         <label for="department_name">Department Name:</label>
                         <input type="text" class="form-control" name="department_name">
                         <input type="hidden" class="form-control" name="department_id">
                     </div>
                     <div class="modal-footer">
                         <button id="dataUpdate" modal-id="editDptModal" class="btn btn-info">Update</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

 {{-- delete Department --}}
 <div class="modal fade" id="deleteModal">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Delete Modal</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body" id="deleteData">
                 <h4>Are you sure? want to delete this data..!!</h4>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btCancel">No</button>
                 <button id="btConfirm" modal-id="deleteModal" type="button" class="btn btn-success">Yes</button>
             </div>
         </div>
     </div>
 </div>
