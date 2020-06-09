<div class="wrapper__back">
  <a class="btn btn-secondary" rel="nofollow" href="/">&lt;&minus; Ga terug</a>
</div>
<div class="wrapper__activity">
  <div class="wrapper__activity__left">
    <div
      class="wrapper__activity__left-banner" 
      style="background-image: url('<?= $this->getValue('activity')->a_Image ?>');" ></div>
  </div>
  <div class="wrapper__activity__right">
    <h2><?= $this->getValue('activity')->a_Name ?></h2>
    <p>
      <strong>Informatie: </strong>
      <br />
      Locatie: 
      <small><?= $this->getValue('activity')->a_Location ?></small>
      <br />
      Tijd: 
      <small><?= $this->getValue('activity')->a_StartTime ?>
      -
      <?= $this->getValue('activity')->a_EndTime ?></small>
      <br />
      Deadline: 
      <small><?= $this->getValue('activity')->a_DeadLine ?></small>
      <br />
      Plekken:
      <small>
        <?= $this->getValue('activity')->a_Max - $this->getValue('activity')->a_Used ?>
        -
        <?= $this->getValue('activity')->a_Max ?> beschikbaar
      </small>
    </p>
    <hr />
    <p>
      <strong>Beschijving: </strong>
      <br />
      <?= $this->getValue('activity')->a_Description ?>
    </p>
    <br />
    <?php if ($this->getValue('take-part') === FALSE): ?>
      <?php if ($this->getValue('activity')->a_Used >= $this->getValue('activity')->a_Max): ?>
        <a class="btn btn-error" rel="nofollow">Helaas zijn er geen plekken meer !</a>
      <?php else: ?> 
        <a class="btn btn-primary" rel="nofollow" href="/activiteit?id=<?= $this->getValue('activity')->a_ID ?>&amp;take_part=1#au">Schijf je nu in !</a>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>
<?php if ($this->getValue('take-part') === TRUE): ?>
<hr />
<div class="wrapper__activity__take-part" id="au">
  <form id="takePartForm" class="form" class="takePartForm">
    <fieldset class="form__fieldset form__fieldset-outline">
      <legend>Inschijven voor: <?= $this->getValue('activity')->a_Name ?></legend>
      <p>Nog even ter bevestiging.</p>
      <!-- Confirm -->
      <div class="form-input__checkbox">
        <label for="inputCheckboxConfirm">Ik weet zeker dat ik mij wil inschijven.</label>
        <input type="checkbox" id="inputCheckboxConfirm" />
      </div>
      <!-- Submit -->
      <button style="margin-left: 0;" class="btn btn-primary" type="submit">Schijf mij in</button>
    </fieldset>
  </form>
</div>
<script src="/public/dist/js/activity.js" defer></script>
<?php endif; ?>