<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete">
    Delete
  </button>

  <!-- Modal -->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <h6>Are you sure you wat to delete {{ $category->categoryName }} Category?</h6>
            <form action="{{ route('categories.destroy', $category) }}" method="post">
                @method('delete')
                @csrf

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>

            </form>
        </div>

      </div>
    </div>
  </div>
