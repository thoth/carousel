<?php

class CarouselsController extends CarouselAppController{





	public function admin_index() {
		$this->set('carousels', $this->paginate());
	}

	public function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid carousel'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('carousel', $this->Carousel->read(null, $id));
	}

	public function admin_add() {
		if (!empty($this->request->data)) {
			$this->Carousel->create();
			if ($this->Carousel->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The carousel has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The carousel could not be saved. Please, try again.'));
			}
		}

		$this->set('title_for_layout', __('Create new Site'));
		$this->render('admin_edit');
	}

	public function admin_edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid carousel'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Carousel->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The carousel has been saved'));
				$this->Croogo->redirect(array('action' => 'edit', $this->Carousel->id));
			} else {
				$this->Session->setFlash(__('The carousel could not be saved. Please, try again.'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Carousel->read(null, $id);
		}

		$this->set('title_for_layout', __('Edit Site'));
	}

	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for carousel'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Carousel->delete($id)) {
			$this->Session->setFlash(__('Site deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Site was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}