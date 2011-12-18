<?php

/**
 * article actions.
 *
 * @package    simde
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->articles = ArticleTable::getInstance()->getArticlesList()->execute();
    $this->setTemplate('list');
  }

  public function executeList(sfWebRequest $request)
  {
    try {
      $this->asso = $this->getRoute()->getObject();
    }
    catch (Exception $e) {
      $this->forward('article','index');
    }
    $this->articles = ArticleTable::getInstance()->getArticlesList($this->asso->getPrimaryKey())->execute();
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->article = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ArticleForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ArticleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($article = Doctrine_Core::getTable('article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($this->getUser()->getGuardUser()->hasAccess($article->getAsso()->getLogin(),0x04));
    $this->form = new ArticleForm($article);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($article = Doctrine_Core::getTable('article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($this->getUser()->getGuardUser()->hasAccess($article->getAsso()->getLogin(),0x04));
    $this->form = new ArticleForm($article);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($article = Doctrine_Core::getTable('article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($this->getUser()->getGuardUser()->hasAccess($article->getAsso()->getLogin(),0x04));
    $article->delete();

    $this->redirect('article/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $article = $form->save();

      $this->redirect('article/edit?id='.$article->getId());
    }
  }
}
