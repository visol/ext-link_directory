<?php
namespace Visol\LinkDirectory\Domain\Repository;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * The repository for Links
 */
class LinkRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * @param $category \TYPO3\CMS\Extbase\Domain\Model\Category
	 * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findByCategory($category) {
		$query = $this->createQuery();
		$query->matching(
			$query->contains('categories', $category)
		);
		return $query->execute();
	}


}