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
    <ul>
      <?php foreach ($this->getValue('activities') as $activity): ?>
      <li class="index-wrapper__activiteiten__activiteit">
        <div class="index-wrapper__activiteiten__activiteit__left">
        </div>
        <div class="index-wrapper__activiteiten__activiteit__right">
          <p>
            <strong><?= $activity->a_Title ?></strong>
          </p>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>