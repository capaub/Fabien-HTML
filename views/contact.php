<main>
    <h1>Formulaire de contact</h1>

    <form action="?page=<?= PAGE_CONTACT; ?>" method="POST">
        <div>
            <label for="subject">Titre</label>
            <input required type="text" id="subject" name="field_subject" placeholder="Saississez le titre de votre message" />
        </div>
        <div>
            <label for="content">Message</label>
            <textarea required type="text" id="content" name="field_content" placeholder="Contenue de votre message"></textarea>
        </div>
        <div>
            <label for="options">Options de message</label>
            <select>
                <option value="urgent">Prioritaire</option>
                <option value="attachement">Avec pièce-jointe</option>
            </select>
        </div>
        <button name="form_contact" value="contact">Envoyer</button>
        <input type="hidden" name="page" value="contact" />
    </form>
</main>

<!--<main>-->
<!--    <form class="container" method="POST" class="form-example">-->
<!--        <fieldset class="row">-->
<!--            <legend class="text-center text-white">Formulaire de contact</legend>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white" for="field_contact_subject">Titre</label>-->
<!--                <input class="col-8 offset-2 bg-secondary" type="text" name="field_contact_subject"-->
<!--                       id="field_contact_subject" required>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <label class="col-8 offset-2 text-white" for="field_contact_content">Message</label>-->
<!--                <textarea class="col-8 offset-2 bg-secondary" name="field_contact_content" id="field_contact_content"-->
<!--                          cols="30" rows="10"></textarea>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <label class="text-white col-8 offset-2" for="field_contact_type">Catégorie</label>-->
<!--                <select class="col-3 offset-2 bg-secondary" id="field_contact_type" name="field_contact_type">-->
<!--                    <option>Prioritaire</option>-->
<!--                    <option>Message libre</option>-->
<!--                </select>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <button class="col-2 offset-2 my-3 text-white bg-secondary" name="send_contact">Envoyer</button>-->
<!--            </div>-->
<!--        </fieldset>-->
<!--    </form>-->
<!--</main>-->