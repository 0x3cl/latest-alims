export function deleteModal(code) {
    const div = `
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Deletion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">To proceed, please type the captcha shown below</p>
                    <div class="captcha">
                        <h1 class="m-0"><code>${code}</code></h1>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><code>Captcha Code</code></span>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Enter Code" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="control-delete-proceed">Continue</button>
                </div>
            </div>
        </div>
    </div>
    `;

    $('#confirmDeleteModal').remove();
    $('body').append(DOMPurify.sanitize(div));
    $('#confirmDeleteModal').modal('show');
}