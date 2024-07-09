<?php

namespace Drupal\saibher_web_components\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'hero block component' block.
 *
 * @Block(
 *   id = "hero_components",
 *   admin_label = @Translation("Componentes Hero"),
 * )
 */
class HeroComponentsBlock extends BlockBase {

  public function defaultConfiguration() {
    return [
        'hero_type' => Null,
        'title' => $this->t('Main title'),
        'sub_title' => $this->t('Secondary title'),
        'body' => $this->t('Lorem ipsum dolor sit amet consectetur adipisicing elit.'),
        'cta' => $this->t(''),
        'cta_2' => $this->t(''),
        'main_image' => $this->t(''),
        'logo' => $this->t(''),
        'main_color' => $this->t('black'),
        'secondary_color' => $this->t('gray'),
    ];
  }

  public function blockForm($form, FormStateInterface $form_state) {
    $step = $form_state->get('step') ?? 1;
    if($this->configuration['hero_type']) {
        $step = 2;
    }
    if($step == 1) {
        $form['hero_type'] = [
            '#type' => 'radios',
            '#title' => $this->t('Select hero style you want'),
            '#options' => [
              'hero_1' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_1.png"/>
              '),
              'hero_2' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_2.png"/>
              '),
              'hero_3' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_3.png"/>
              '),
              'hero_4' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_4.png"/>
              '),
              'hero_5' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_5.png"/>
              '),
              'hero_6' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_6.png"/>
              '),
              'hero_7' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_7.png"/>
              '),
              'hero_8' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_8.png"/>
              '),
              'hero_9' => $this->t('<img
                src="/modules/custom/saibher_web_components/files/img/hero_9.png"/>
              '),
            ],
          ];
    } else {
        $form['title'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Main title'),
          '#default_value' => $this->configuration['title'],
        ];
        $form['sub_title'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Secondary title'),
          '#default_value' => $this->configuration['sub_title'],
        ];
        $form['body'] = [
          '#type' => 'textarea',
          '#title' => $this->t('Body'),
          '#default_value' => $this->configuration['body'],
        ];
        $form['cta'] = [
            '#type' => 'linkit',
            '#title' => $this->t('Call to action'),
            '#default_value' => $this->configuration['cta'],
        ];
        $form['cta_2'] = [
            '#type' => 'linkit',
            '#title' => $this->t('Call to action'),
            '#default_value' => $this->configuration['cta'],
        ];
    }

    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    dump($values);
    die;
    $this->configuration['hello_block_name'] = $values['hello_block_name'];
  }

  public function build() {
    // Puedes poner cualquier contenido o lógica aquí para renderizar en el bloque.
    return [
      '#markup' => $this->t('¡Hola, este es un bloque personalizado!'),
    ];
  }
}