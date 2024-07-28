<?php declare(strict_types = 0);

?>


window.widget_problems_form = new class {

	init({sort_with_enabled_show_timeline}) {
		this._sort_with_enabled_show_timeline = sort_with_enabled_show_timeline;

		this._show_tags = document.getElementById('show_tags');
		this._show_tags.addEventListener('change', () => this.updateForm());

		this._sort_triggers = document.getElementById('sort_triggers');
		this._sort_triggers.addEventListener('change', () => this.updateForm());

		this._show_timeline = document.getElementById('show_timeline');
		this._show_timeline_value = this._show_timeline.checked;

		this._acknowledge_status = document.getElementById('acknowledgement_status');
		this._acknowledge_status.addEventListener('change', () => this.updateForm());

		this.updateForm();
	}

	updateForm() {
		const show_tags = this._show_tags.querySelector('input:checked').value != <?= SHOW_TAGS_NONE ?>;

		document.getElementById('tag_priority').disabled = !show_tags;

		for (const radio of document.querySelectorAll('#tag_name_format input')) {
			radio.disabled = !show_tags;
		}

		if (this._acknowledge_status.querySelector('input:checked').value != <?= ZBX_ACK_STATUS_ACK ?>) {
			document.getElementById('acknowledged_by_me').disabled = true;
			document.getElementById('acknowledged_by_me').checked = false;
		}
		else {
			document.getElementById('acknowledged_by_me').disabled = false;
		}

		if (this._sort_with_enabled_show_timeline[this._sort_triggers.value]) {
			this._show_timeline.disabled = false;
			this._show_timeline.checked = this._show_timeline_value;
		}
		else {
			this._show_timeline.disabled = true;
			this._show_timeline_value = this._show_timeline.checked;
			this._show_timeline.checked = false;
		}
	}
};