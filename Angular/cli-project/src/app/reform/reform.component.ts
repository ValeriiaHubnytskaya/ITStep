import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators} from '@angular/forms'

@Component({
  selector: 'app-reform',
  templateUrl: './reform.component.html',
  styleUrls: ['./reform.component.css']
})
export class ReformComponent implements OnInit {

  registerForm = new FormGroup({ //Группа элементов - форма
  login: new FormControl("",[Validators.required]), //элементы input
  realName: new FormControl("", [Validators.required, Validators.minLength(3)]), // input
    birthdate: new FormControl("",[Validators.required]),
    email: new FormControl("",[Validators.required]),
    gender: new FormControl("",[Validators.required]),
    agree: new FormControl("",[Validators.requiredTrue]),
    image: new FormControl("",[Validators.required]),
});
  constructor() { }

  ngOnInit(): void {
  }
  regClick(): void {
  console.log(this.registerForm.value, this.registerForm.valid);
  this.registerForm.markAsUntouched();
  }

}
