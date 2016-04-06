<?php
/**
 * @file
 * Contains \Drupal\unibuc\Plugin\Block\LinksBlock.
 */
namespace Drupal\unibuc_weather\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a custom block.
 *
 * @Block(
 *   id = "unibuc_weather_block",
 *   admin_label = @Translation("A block that shows weather info."),
 *   category = @Translation("Blocks")
 * )
 */
class LinksBlock extends BlockBase implements BlockPluginInterface {

    /**
     * {@inheritdoc}
     */
    public function build() {
      $config = $this->getConfiguration();

      if (!empty($config['unibuc_weather_api_key'])) {
        $url = 'http://api.openweathermap.org/data/2.5/forecast/city?id=683506&APPID=' . $config['unibuc_weather_api_key'];

        $data = (string) \Drupal::httpClient()->get($url)->getBody();

        $data = json_decode($data);
        $temp = $data->list[0]->main->temp;
        $degree = $config['unibuc_weather_api_display'];

        if ($config['unibuc_weather_api_display'] == 'c') {
          $temp = $temp - 273;
        } else {
          $temp = $temp * 9 / 5 - 460;
        }

        return array(
          '#markup' => $this->t('The temperature in @city is @temp @degree', array('@city' => 'Bucharest', '@temp' => $temp, '@degree' => strtoupper($degree)))
        );
      } else {
        return array(
          '#markup' => $this->t("Please set your API Key from <a target='_blank' href='http://openweathermap.org/'>openweathermap.org</a>")
        );
      }
    }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state){
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    $form['unibuc_weather_api_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Api Key'),
      '#description' => $this->t('Apy Key for openweathermap.org'),
      '#default_value' => isset($config['unibuc_weather_api_key']) ? $config['unibuc_weather_api_key'] : ''
    );

    $form['unibuc_weather_api_display'] = array(
      '#type' => 'select',
      '#title' => $this->t('Display in'),
      '#options' => array(
        'c' => 'C',
        'f' => 'F'
      ),
      '#description' => $this->t('How to display the temperature.'),
      '#default_value' => isset($config['unibuc_weather_api_display']) ? $config['unibuc_weather_api_display'] : ''
    );

    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state){
    $this->setConfigurationValue('unibuc_weather_api_key', $form_state->getValue('unibuc_weather_api_key'));
    $this->setConfigurationValue('unibuc_weather_api_display', $form_state->getValue('unibuc_weather_api_display'));
  }
}
