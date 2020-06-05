<?php

/*
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, version 3 of the License.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

?>

<div class="index-wrapper">
  <div class="index-wrapper__activiteiten">
    <h2>Activiteiten</h2>
    <hr />
    <ul>
      <?php foreach ($this->getValue('activities') as $activity): ?>
        <li class="index-wrapper__activiteiten__activiteit">
          <div class="index-wrapper__activiteiten__activiteit__left">
            <div style="background-image: url('<?= $activity->a_Image ?>');">
              <a class="btn btn-white">
                <span>Schijf je in</span> 
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                  <path d="M0 0h24v24H0z" fill="none"/>
                  <path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4z"/>
                </svg>
              </a>
            </div>
          </div>
          <div class="index-wrapper__activiteiten__activiteit__right">
            <p>
              <strong><?= $activity->a_Name ?></strong>
              <br />
              <small>
                <span><?= $activity->a_StartTime ?></span>
                -
                <span><?= $activity->a_EndTime ?></span>
              </small>
            </p>
            <a class="btn btn-primary">Bekijk activiteit</a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>