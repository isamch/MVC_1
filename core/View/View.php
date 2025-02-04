<?php


namespace Core\View;

class View
{

  public static function make($mainView, $view, $params = [])
  {

    $baseContent = self::getBaseContent($mainView);
    $viewContent = self::getViewContent($view, $params);
    self::templateEngine($viewContent, $baseContent, $params);
  }



  private static function templateEngine($viewContent, $baseContent, $params)
  {

    // work template engine :    
    $finalPage = str_replace('{{content}}', $viewContent, $baseContent);
    $finalPage = preg_replace('/{{\s*(.+?)\s*}}/', '<?php echo $$1; ?>', $finalPage);
    $finalPage = self::engineFunctions($finalPage);

    file_put_contents(base_path() . '/app/Cache' . '/template.php', $finalPage);
    extract($params);

    ob_start();
    include base_path() . '/app/Cache' . '/template.php';
    $output = ob_get_clean();
    echo $output;

    dump($output);
    exit;
  }



  private static function engineFunctions($contents)
  {

    // if :
    $contents = preg_replace('/@if\((.*?)\):/', '<?php if ($1): ?>', $contents);
    $contents = str_replace('@endif;', '<?php endif; ?>', $contents);

    // foreach :
    $contents = preg_replace('/@foreach\((.*?)\):/', '<?php foreach ($1): ?>', $contents);
    $contents = str_replace('@endforeach;', '<?php endforeach; ?>', $contents);

    return $contents;
  }




  public static function getBaseContent($mainView)
  {
    ob_start();
    include view_path() . "/layouts/$mainView.php";
    return ob_get_clean();
  }



  public static function getViewContent($view, $params)
  {
    // extract($params);
    ob_start();
    include view_path() . "/pages/$view.php";
    return ob_get_clean();
  }
}
