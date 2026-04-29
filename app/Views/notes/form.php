<div class="main">
  <div class="topbar">
    <div class="topbar-title">Insertion de notes</div>
    <div class="topbar-actions">
      <a href="<?= site_url('notes') ?>" class="btn btn-secondary btn-sm">
        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Retour
      </a>
    </div>
  </div>

  <div class="content">
    <form id="notesForm" method="POST" action="<?= site_url('notes/ajouter') ?>">
      <div class="form-card">
        <div class="form-section-title">Ajouter les notes</div>
        
        <table style="width: 100%; border-collapse: collapse;">
          <thead>
            <tr style="border-bottom: 2px solid #ddd;">
              <th style="padding: 12px; text-align: left;">Matière</th>
              <th style="padding: 12px; text-align: left;">Note</th>
              <th style="padding: 12px; text-align: center; width: 50px;">Action</th>
            </tr>
          </thead>
          <tbody id="tbody">
          </tbody>
        </table>

        <div style="margin-top: 16px;">
          <button type="button" onclick="addRow()" class="btn btn-secondary btn-sm">
            <svg viewBox="0 0 24 24" width="16" height="16"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Ajouter
          </button>
        </div>
      </div>

      <div class="form-footer">
        <a href="<?= site_url('notes') ?>" class="btn btn-secondary">Annuler</a>
        <button type="submit" class="btn btn-primary">
          <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
          Enregistrer
        </button>
      </div>
    </form>
  </div>
</div>

<script>
let i = 0;
document.addEventListener('DOMContentLoaded', addRow);

function addRow() {
  const tr = document.createElement('tr');
  tr.id = 'row-' + i;
  tr.style.borderBottom = '1px solid #f0f0f0';
  tr.innerHTML = `
    <td style="padding: 12px;">
      <select name="ue_id[]" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        <option value="">— Sélectionner —</option>
        <?php if (isset($ues)): ?>
          <?php foreach ($ues as $ue): ?>
            <option value="<?= $ue['id'] ?>"><?= $ue['label'] ?> (<?= $ue['credits'] ?> cr.)</option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </td>
    <td style="padding: 12px;">
      <input type="number" name="note[]" min="0" max="20" step="0.5" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </td>
    <td style="padding: 12px; text-align: center;">
      <button type="button" onclick="rmRow('row-${i}')" class="btn btn-danger btn-sm" style="padding: 4px 8px;">
        <svg viewBox="0 0 24 24" width="14" height="14"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
      </button>
    </td>
  `;
  document.getElementById('tbody').appendChild(tr);
  i++;
}

function rmRow(id) {
  if (document.querySelectorAll('#tbody tr').length > 1) {
    document.getElementById(id).remove();
  }
}
</script>

<style>
.btn-danger { background-color: #f44336; color: white; }
.btn-danger:hover { background-color: #da190b; }
</style>