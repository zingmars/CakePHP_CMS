<form action="<?=$this->request->here?>" method="post" id="loginform" name="loginform">
    <h1 class="text-light">Login</h1>
    <hr class="thin"/>
    <br />
    <div class="input-control text full-size" data-role="input">
        <label for="user_login">Username:
            <input class="input" type="text" name="log" id="user_login">
        </label>
        <button class="button helper-button clear"><span class="mif-cross"></span></button>
    </div>
    <br />
    <br />
    <div class="input-control password full-size" data-role="input">
        <label for="user_pass">Password:
            <input class="input" type="password" name="pwd" id="user_pass">
        </label>
        <button class="button helper-button reveal"><span class="mif-looks"></span></button>
    </div>
    <br />
    <br />
    <input type="hidden" name="_csrfToken" value="<?= $this->request->params['_csrfToken'] ?>">
    <p class="submit">
        <button id="wp-submit" name="wp-submit" type="submit" class="button primary">Login</button>
        <a href="<?=$this->Url->build(['controller'=>'blog', 'action'=>'index'])?>"><button type="button" class="button link">Cancel</button></a>
    </p>
</form>
