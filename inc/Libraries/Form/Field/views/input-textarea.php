<?php
$defaults = [
	'name'        => '',
	'value'       => isset( $args['default'] ) ? $args['default'] : null,
	'label'       => null,
	'description' => null,
	'class'       => 'large-text',
	'disabled'    => false,
	'required'    => false,
];

$args          = wp_parse_args( $args, $defaults );
$args['value'] = $this->get_field_value( $args );

$disabled = '';
if ( $args['disabled'] ) {
	$disabled = ' disabled="disabled"';
}

$output = '<div class="gg_woo_bt-field-wrap gg_woo_bt-textarea-field-wrap form-group" id="gg_woo_bt-' . sanitize_key( $this->form_id . $args['id'] ) . '-wrap">';

if(  $this->show_label ) {
	$output .= '<label class="gg_woo_bt-label" for="gg_woo_bt-' . sanitize_key( $this->form_id . $args['id'] ) . '">' . esc_html( $args['name'] ) . '</label>';
}
$data = '';
if ( $args['required'] ) {
	$data .= ' required="required" ';
}

if ( $args['placeholder'] ) {
	$data .= ' placeholder="' . esc_attr( $args['placeholder'] ) . '"';
}

$output .= '<div class="gg_woo_bt-field-main">';
$output .= '<textarea name="' . esc_attr( $args['id'] ) . '"  id="' . esc_attr( $this->form_id . $args['id'] ) . '" class="' . $args['class'] . '"' . $disabled . ' ' . $data . ' >' . esc_attr(
		$args['value'] ) . '</textarea>';

if ( ! empty( $args['description'] ) ) {
	$output .= '<p class="gg_woo_bt-description">' . $args['description'] . '</p>';
}

$output .= '</div>';
$output .= '</div>';

echo $output;
