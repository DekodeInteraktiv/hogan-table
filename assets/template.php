<?php
/**
 * Template for table module
 *
 * $this is an instance of the Table object.
 *
 * @package Hogan
 */
?>

<?php if ( ! empty( $this->heading ) ) : ?>
	<h2 class="heading"><?php echo esc_html( $this->heading ); ?></h2>
<?php endif; ?>

<?php
if ( ! empty( $this->table_content ) ) :

	echo '<table>';

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
