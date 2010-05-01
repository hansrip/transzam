<?php

/**
 * transporter actions.
 *
 * @package    transzam
 * @subpackage transporter
 * @author     Hans Rip
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class transporterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->transporters = Doctrine::getTable('Transporter')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->transporter = Doctrine::getTable('Transporter')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->transporter);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TransporterForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TransporterForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($transporter = Doctrine::getTable('Transporter')->find(array($request->getParameter('id'))), sprintf('Object transporter does not exist (%s).', $request->getParameter('id')));
    $this->form = new TransporterForm($transporter);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($transporter = Doctrine::getTable('Transporter')->find(array($request->getParameter('id'))), sprintf('Object transporter does not exist (%s).', $request->getParameter('id')));
    $this->form = new TransporterForm($transporter);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($transporter = Doctrine::getTable('Transporter')->find(array($request->getParameter('id'))), sprintf('Object transporter does not exist (%s).', $request->getParameter('id')));
    $transporter->delete();

    $this->redirect('transporter/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $transporter = $form->save();

      $this->redirect('transporter/edit?id='.$transporter->getId());
    }
  }
}
