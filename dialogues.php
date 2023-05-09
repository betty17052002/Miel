<div class="modal" id="dialogConfirmDel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Confirmation de suppression</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Confirmez-vous la supression definitive de cet article dans la BDD?</p>
            <div id="deleteArticleContent"></div>
        </div>
        <div class="modal-footer">
            <input style="display: none" id="deleteArticleIdField">
            <button
                type="button"
                onclick="deleteArticle(document.getElementById('deleteArticleIdField').value)"
                class="btn btn-primary"
            >Oui</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
        </div>
    </div>
</div>
