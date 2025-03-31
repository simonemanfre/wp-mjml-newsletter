/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function Save() {
	return (
		<code {...useBlockProps.save()}>
			<mj-section>
				<mj-column>
					<mj-text
						color="#525252"
						font-size="18px"
						line-height="1.4"
						align="left"
					>
						<InnerBlocks.Content />
					</mj-text>
				</mj-column>
			</mj-section>
		</code>
	);
}
