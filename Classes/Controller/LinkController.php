<?php
namespace Visol\LinkDirectory\Controller;

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
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * LinkController
 */
class LinkController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Visol\LinkDirectory\Domain\Repository\LinkRepository
	 * @inject
	 */
	protected $linkRepository = NULL;

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$categories = $this->categoryRepository->findByParent((int)$this->settings['parentCategory']);
		$categoryAndLinksItems = [];
		$i = 0;
		foreach ($categories as $category) {
			/** @var $category \TYPO3\CMS\Extbase\Domain\Model\Category */
			$categoryAndLinksItems[$i]['category'] = $category;
			$categoryAndLinksItems[$i]['links'] = $this->linkRepository->findByCategory($category);
			$i++;
		}
		$this->view->assign('categoryAndLinksItems', $categoryAndLinksItems);
	}

}