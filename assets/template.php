<?php
/**
 * Template for table module
 *
 * $this is an instance of the Table object.
 *
 * Available properties:
 * $this->heading (string) Module heading.
 * $this->table_content (array) Table data.
 *
 * @package Hogan
 */

declare( strict_types = 1 );

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) || ! ( $this instanceof Table ) ) {
	return; // Exit if accessed directly.
}

if ( ! empty( $this->heading ) ) {
	hogan_component( 'heading', [
		'title' => $this->heading,
	] );
}

if ( ! empty( $this->table_content ) ) {

	echo '<table>';

	if ( $this->table_content['header'] ) {
		echo '<thead>';
		echo '<tr>';

		foreach ( $this->table_content['header'] as $th ) {
			printf( '<th>%s</th>',
				wp_kses( apply_filters( 'hogan/module/table/content/table_header', $th['c'] ), $this->content_allowed_html )
			);
		}

		echo '</tr>';
		echo '</thead>';
	}

	echo '<tbody>';

	foreach ( $this->table_content['body'] as $tr ) {
		echo '<tr>';

		foreach ( $tr as $td ) {
			printf( '<td>%s</td>',
				wp_kses( apply_filters( 'hogan/module/table/content/table_data', $td['c'] ), $this->content_allowed_html )
			);
		}

		echo '</tr>';
	}

	echo '</tbody>';
	echo '</table>';
}
