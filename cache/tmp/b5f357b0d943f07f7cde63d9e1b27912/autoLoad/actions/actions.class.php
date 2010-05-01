<?php

/**
 * load actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage load
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoLoadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->transport_loads = Doctrine::getTable('TransportLoad')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->transport_load = Doctrine::getTable('TransportLoad')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->transport_load);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TransportLoadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TransportLoadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($transport_load = Doctrine::getTable('TransportLoad')->find(array($request->getParameter('id'))), sprintf('Object transport_load does not exist (%s).', $request->getParameter('id')));
    $this->form = new TransportLoadForm($transport_load);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($transport_load = Doctrine::getTable('TransportLoad')->find(array($request->getParameter('id'))), sprintf('Object transport_load does not exist (%s).', $request->getParameter('id')));
    $this->form = new TransportLoadForm($transport_load);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($transport_load = Doctrine::getTable('TransportLoad')->find(array($request->getParameter('id'))), sprintf('Object transport_load does not exist (%s).', $request->getParameter('id')));
    $transport_load->delete();

    $this->redirect('load/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $transport_load = $form->save();

      $this->redirect('load/edit?id='.$transport_load->getId());
    }
  }
}
