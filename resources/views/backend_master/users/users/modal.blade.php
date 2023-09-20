<div class="modal" id="deletetModal">
    <form action="{{ url('/panel/dashboard/user/delete') }} " method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div style="display: flex;
            align-items: center;">
                        <i class="bi bi-exclamation-octagon text-xl text-danger"
                            style="font-size: 2rem;    margin-right: 1rem"> </i>Are you sure you want to go?
                        <input type='hidden' name='user_id' id='delete_id' />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="/panel/dashboard/user/{{$user->id}}"><button type="button" class="btn btn-sm  btn-primary">Yes</button></a>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End Basic Modal-->

{{--

<div class="modal fade" id="deletetModsl">
    <form action="{{ url('posts/delete')}} " method="POST">
        @csrf
       @method('DELETE')
        <div class="modal-dialog modal-sm " style="border-top: 5px solid #ffc107;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;">
            <div class="modal-content" style="border: none;">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <p class="text-dark fs-5">Are your sure delete ? <i
                            class="bi bi-question-lg"></i>
                    </p>
                    <input type='hidden' name='posts_id' id='deleteid' />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-sm btn-danger "
                        data-dismiss="modal">No</button>
                    <button type="submit" class="btn bnt-sm btn-sm btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </form>
</div>
 --}}
