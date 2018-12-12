<?php
namespace Drupal\simple_module1\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class Form1 extends FormBase {

  function getFormId() {
      return 'simple_module1';
  }

  function buildForm(array $form, FormStateInterface $form_state) {
    $form['FirstName'] = array(
      '#type' => 'textfield',
      '#title' => t('First name:'),
      '#required' => TRUE,
    );
	$form['LastName'] = array(
      '#type' => 'textfield',
      '#title' => t('Last name:'),
      '#required' => TRUE,
    );
    $form['Email'] = array(
      '#type' => 'email',
      '#title' => t('Email:'),
      '#required' => TRUE,
    );
    $form['Mobile'] = array (
      '#type' => 'tel',
      '#title' => t('Mobile number:'),
      '#required' => TRUE,
    );
    $form['Address'] = array (
      '#type' => 'textfield',
      '#title' => t('Address:'),
      '#required' => TRUE,
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    );
    return $form;
  }
    
  function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('Mobile')) < 10 || strlen($form_state->getValue('Mobile')) > 13) {
      $form_state->setErrorByName('Mobile', $this->t('Your mobile number is wrong (10-13 digits)!'));
    }
  }
  	
  function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message('Your subscription details:');
    foreach ($form_state->getValues() as $key => $value) {
       drupal_set_message($key . ': ' . $value);
    }
    drupal_set_message('Thank you for your subscription. You will receive a digital edition to your email and a print delivery to your address every month.');
  }
}
?>