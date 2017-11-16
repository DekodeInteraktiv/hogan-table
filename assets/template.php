<?php
/**
 * Template for table module
 *
 * $this is an instance of the Table object.
 *
 * @package Hogan
 */

if ( ! empty( $this->table_content ) ) :

	echo '<table border="0">';

	if ( $this->table_content['header'] ) {

		echo '<thead>';

		echo '<tr>';

		foreach ( $this->table_content['header'] as $th ) {

			echo '<th>';
			echo $th['c'];
			echo '</th>';
		}

		echo '</tr>';

		echo '</thead>';
	}

	echo '<tbody>';

	foreach ( $this->table_content['body'] as $tr ) {

		echo '<tr>';

		foreach ( $tr as $td ) {

			echo '<td>';
			echo $td['c'];
			echo '</td>';
		}

		echo '</tr>';
	}

	echo '</tbody>';

	echo '</table>';
endif;
